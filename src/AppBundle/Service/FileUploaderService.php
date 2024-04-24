<?php

namespace App\AppBundle\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploaderService
{
    private Filesystem $filesystem;
    private SluggerInterface $slugger;
    private string $uploadsDirectory;

    public function __construct(Filesystem $filesystem, SluggerInterface $slugger, string $uploadsDirectory)
    {
        $this->filesystem = $filesystem;
        $this->slugger = $slugger;
        $this->uploadsDirectory = $uploadsDirectory;
    }

    public function upload(UploadedFile $file, ?string $filename, string $folder, bool $uniqueId = false): string
    {
        if($filename === null) {
            $newFilename = $file->getClientOriginalName();
        } else {
            $newFilename = strtolower($this->slugger->slug($filename));
        }

        if($uniqueId) {
            $newFilename .= uniqid();
        }

        if($filename) {
            $newFilename .= '.' . $file->guessExtension();
        }

        $fullDir = $this->uploadsDirectory . '/' . $folder;
        if(!file_exists($fullDir)) {
            mkdir($fullDir, 0777, true);
        }
        $file->move($fullDir, $newFilename);

        return $newFilename;
    }

    public function remove(string $filename, string $folder): void
    {
        $fullPath = $this->uploadsDirectory . '/' . $folder . '/' . $filename;
        if($this->filesystem->exists($fullPath)) {
            $this->filesystem->remove($fullPath);
        }
    }
}
