<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'report';
    protected $useTimestamp = true;
    protected $allowedFields = ['pelapor', 'korban', 'alamat', 'nomerhp', 'email', 'masalah', 'tanggal'];
}