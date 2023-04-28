<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Form\BrandFormFactory;
use App\Repository\BrandRepository;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;


final class BrandPresenter extends Presenter
{
    private ?int $brandId = null;
    public function __construct(
        private BrandFormFactory $brandFormFactory,
        private BrandRepository $brandRepository,
    ) {
        parent::__construct();
    }

    protected function createComponentBrandForm(): Form
    {
        $form = $this->brandFormFactory->create($this->brandId);
        $form->onSuccess[] = function (Form $form) {
            $this->flashMessage('Značka byla uložena.', 'success');
            $this->redirect('default');
        };

        return $form;
    }

    public function renderDefault(): void
    {
        $this->template->brands = $this->brandRepository->getBrands();
    }

    public function validateBrandForm(Form $form, Nette\Utils\ArrayHash $values): void
    {
        if ($values->name === '') {
            $form->addError('test');
            $this->redrawControl('testForm');
        }
    }

    public function handleRefresh(): void
    {
        // refresh data
    }

    public function actionAdd(): void
    {
        $this->modal();
    }

    public function actionEdit(int $id): void
    {
        $this->modal();

        $this->brandId = $id;
        $brand = $this->brandRepository->getBrand($id);

        if (!$brand) {
            $this->error('Značka nebyla nalezena.');
        }

        $this['brandForm']->setDefaults($brand->toArray());
    }

    public function actionDelete(int $id): void
    {
        $brand = $this->brandRepository->getBrand($id);
        if ($brand) {
            $brand->delete();
            $this->flashMessage('Značka byla smazána.', 'success');
            $this->redirect('default');
        } else {
            $this->error('Značka nebyla nalezena.');
        }
    }

    private function modal(): void
    {
        if ($this->isAjax()) {
            $this->payload->showModal = true;
            $this->payload->modalId = 'myModal';
            $this->redrawControl('modal');
        }
    }
}
