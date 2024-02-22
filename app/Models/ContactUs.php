<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contactus_form';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name','contact_number','whats_app_number','education'];
}
