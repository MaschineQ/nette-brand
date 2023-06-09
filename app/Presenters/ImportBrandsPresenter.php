<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Repository\ImportBrandsRepository;
use Nette\Application\UI\Presenter;

class ImportBrandsPresenter extends Presenter
{
	public function __construct(
		private ImportBrandsRepository $importBrandsRepository,
	) {
		parent::__construct();
	}


	public function renderDefault(): void
	{
	}


	public function actionImport(): void
	{
		$this->importBrandsRepository->importBrands();
		$this->flashMessage('Značky byly importovány.', 'success');
		$this->redirect('default');
	}
}
