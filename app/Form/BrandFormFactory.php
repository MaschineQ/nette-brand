<?php

declare(strict_types=1);

namespace App\Form;

use App\Repository\BrandRepository;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\ArrayHash;

class BrandFormFactory
{
    private ?int $brandId = null;

    public function __construct(
        private BrandRepository $brandRepository,
    )
    {}

    public function create(?int $brandId): Form
    {
        $this->brandId = $brandId;
        $form = new Form();

        $form->addText('name', 'Name');
        $form->addSubmit('save', 'Uložit');

        $form->onSuccess[] = [$this, 'brandFormSucceeded'];

        return $form;
    }

    public function brandFormSucceeded(Form $form, ArrayHash $values): void
    {
        $brandId = $this->brandId;

        if ($brandId) {
            try {
                $this->brandRepository->updateBrand($brandId, $values);
            } catch (UniqueConstraintViolationException $e) {
                $form->addError('Značka s tímto názvem již existuje.');
            }
        } else {
            try {
                $this->brandRepository->addBrand($values);
            } catch (UniqueConstraintViolationException $e) {
                $form->addError('Značka s tímto názvem již existuje.');
            }
        }
    }
}
