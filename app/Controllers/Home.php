<?php

namespace App\Controllers;

use App\Models\ReportModel;

class Home extends BaseController
{
	protected $reportModel;
	
	public function __construct(){
		$this->reportModel = new ReportModel();
	}

	public function index()
	{
		return view('website/home');
	}

	public function form()
	{
		return view('website/form');
	}

	public function data()
	{
		$report = $this->reportModel->findAll();

		$data = [
			'report' => $report
		];

		return view('website/data', $data);
	}

	public function create()
	{
		$this->reportModel->save([
			'pelapor' => $this->request->getVar('pelapor'),
			'korban' => $this->request->getVar('korban'),
			'alamat' => $this->request->getVar('alamat'),
			'nomerhp' => $this->request->getVar('nomerhp'),
			'email' => $this->request->getVar('email'),
			'masalah' => $this->request->getVar('masalah'),
			'tanggal' => $this->request->getVar('tanggal')
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

		return redirect()->to(base_url('/form'));
	}

	public function delete($id)
	{
		$this->reportModel->delete($id);

		session()->setFlashdata('pesan', 'Data berhasil dihapus');

		return redirect()->to(base_url('/data'));
	}
}
