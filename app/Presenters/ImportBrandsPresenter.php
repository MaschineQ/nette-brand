<?php

namespace App\Presenters;

use App\Repository\BrandRepository;
use App\Repository\ImportBrandsRepository;
use Nette\Application\UI\Presenter;

class ImportBrandsPresenter extends Presenter
{
    public function __construct
    (
        private ImportBrandsRepository $importBrandsRepository
    )
    {}

    public function renderDefault(): void
    {

    }

    public function actionImport()
    {
        $this->importBrandsRepository->importBrands();
        $this->flashMessage('Značky byly importovány.', 'success');
        $this->redirect('default');
    }
}
