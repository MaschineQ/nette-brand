<?php

declare(strict_types=1);

namespace App\Repository;

use Nette\Database\Explorer;

class ImportBrandsRepository
{
	public const TABLE_NAME = 'brand';

	/** @var string[]  */
	private array $brands = [
		'Nike',
		'Adidas',
		'Puma',
		'Reebok',
		'Under Armour',
		'New Balance',
		'Asics',
		'Converse',
		'Vans',
		'Fila',
		'Skechers',
		'Brooks',
		'The North Face',
		'Columbia',
		'Salomon',
		'Timberland',
		'Merrell',
		'Keen',
		'ECCO',
		'Hoka One One',
		'On Running',
		'Altra',
		'Saucony',
		'Mizuno',
		'Wilson',
		'Head',
		'Babolat',
		'Yonex',
		'Prince',
		'Dunlop',
		'K-Swiss',
		'Lotto',
		'Diadora',
		'Kappa',
		'Joma',
		'Hummel',
		'Le Coq Sportif',
		'Uhlsport',
		'Mitre',
		'Kelme',
		'Canterbury',
		'Skins',
		'2XU',
		'Sugoi',
		'Castelli',
		'Pearl Izumi',
		'Gore',
		'Assos',
		'Rapha',
		'Santini',
		'Oakley',
		'Smith Optics',
		'Rudy Project',
		'Bolle',
		'Uvex',
		'Giro',
		'Bell',
		'Lazer',
		'Mavic',
		'Campagnolo',
		'Shimano',
		'SRAM',
		'Easton',
		'RockShox',
		'Fox Racing',
		'Troy Lee Designs',
		"O'Neal",
		'Leatt',
		'661',
		'Alpinestars',
		'Dainese',
		'Thor',
		'Fly Racing',
		'One Industries',
		'Race Face',
		'Atlas',
		'100%',
		'Spy Optic',
		'Tifosi',
		'Endura',
		'Northwave',
		'Sidi',
		'Gaerne',
		'Lake',
		'Fizik',
		'Giro',
		'Specialized',
		'Bontrager',
		'Shimano',
		'Look',
		'Time',
		'Speedplay',
		'Crankbrothers',
		'Mavic',
		'Zipp',
		'Enve',
		'Reynolds',
		'Roval',
		'Giant',
		'Trek',
		'Cannondale',
		'Scott',
		'Santa Cruz',
		'Yeti',
		'Pivot',
		'Ibis',
		'Evil',
		'Rocky Mountain',
		'Orbea',
		'Kona',
		'GT',
		'Jamis',
		'Diamondback',
		'Bianchi',
		'Pinarello',
		'Cervelo',
		'Colnago',
		'Ridley',
		'Wilier',
		'BMC',
		'Merida',
		'Giant',
		'Lapierre',
		'Cube',
		'Canyon',
		'Ghost',
		'Rose',
		'Focus',
		'Scott',
		'Specialized',
		'KTM',
		'Bianchi',
		'Raleigh',
		'Marin',
		'Surly',
		'Salsa'];


	public function __construct(
		private Explorer $database,
	) {
	}


	public function importBrands(): void
	{
		foreach ($this->brands as $brand) {
			$exists = $this->database->table(self::TABLE_NAME)->where('name', $brand)->fetch();

			if (!$exists) {
				$this->database->table(self::TABLE_NAME)->insert([
					'name' => $brand,
				]);
			}
		}
	}
}
