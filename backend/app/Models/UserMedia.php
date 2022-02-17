<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class UserMedia extends Model
{
    use HasFactory;

    protected $table = 'user_media';

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getType(): string
    {
        return $this->media_type;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getFileName(): string
    {
        return $this->filename;
    }
}
