<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class MigrateOldImages extends Command
{
    protected $signature = 'posts:migrate-images';
    protected $description = 'Migrate old images to new database storage';

    public function handle()
    {
        $posts = Post::whereNotNull('image')->get();
        
        foreach ($posts as $post) {
            if (Storage::exists('public/' . $post->image)) {
                $image = Storage::get('public/' . $post->image);
                $type = Storage::mimeType('public/' . $post->image);
                
                $img = Image::make($image)
                    ->fit(800, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                
                $post->image_type = $type;
                $post->image_data = base64_encode($img->encode()->encoded);
                $post->image = null;
                $post->save();
                
                $this->info("Migrated image for post: {$post->id}");
            }
        }
    }
}