<?php

namespace App\Http\Livewire;

use App\Models\WinkPost;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class DownloadComponentCode extends Component
{

    public WinkPost $post;

    public function render()
    {
        return view('livewire.download-component-code');
    }

    public function download(){
        return Storage::disk('s3')->download(
            $this->post->customMeta->attachment, $this->post->customMeta->download_zip
        );
    }
}
