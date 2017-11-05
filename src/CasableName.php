<?php namespace Chunker\NamesCases;


use NCL\NCL;
use NCL\NCLNameCaseRu;

/**
 * Класс склоняемого имени
 *
 * Class CasableName
 * @package Chunker\NamesCases
 * @property NCLNameCaseRu $wizard
 * @property string        $format
 */
class CasableName implements CasesInterface
{
	/** @var NCLNameCaseRu */
	protected $wizard;

	/** @var string Формат по умолчанию */
	protected $format;


	public function __construct(string $word, string $format = 'S N F', bool $isMan = NULL) {

		// Явное указание рода
		$gender = is_null($isMan)
			? NULL
			: ( $isMan ? NCL::$MAN : NCL::$WOMAN );

		// Инициализация
		$this->format = $format;
		$this->wizard = new NCLNameCaseRu();
		$this->wizard->q($word, NULL, $gender);

	}


	/**
	 * Форматированное имя
	 *
	 * @param int         $case
	 * @param string|NULL $format
	 *
	 * @return string
	 */
	protected function getFormatted(int $case, string $format = NULL):string {
		return trim($this->wizard->getFormatted($case, (string)$format ?: $this->format));
	}


	/**
	 * Именительный падеж
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function nominative(string $format = NULL):string {
		return $this->getFormatted(NCL::$IMENITLN, $format);
	}


	/**
	 * Родительный падеж
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function genitive(string $format = NULL):string {
		return $this->getFormatted(NCL::$RODITLN, $format);
	}


	/**
	 * Дательный падеж
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function dative(string $format = NULL):string {
		return $this->getFormatted(NCL::$DATELN, $format);
	}


	/**
	 * Винительный падеж
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function accusative(string $format = NULL):string {
		return $this->getFormatted(NCL::$VINITELN, $format);
	}


	/**
	 * Творительный падеж
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function ablative(string $format = NULL):string {
		return $this->getFormatted(NCL::$TVORITELN, $format);
	}


	/**
	 * Предложный падеж
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function prepositional(string $format = NULL):string {
		return $this->getFormatted(NCL::$PREDLOGN, $format);
	}


	/**
	 * Род
	 *
	 * @return int
	 */
	public function gender():int {
		return $this->wizard->genderAutoDetect();
	}


	/**
	 * Имя мужского рода?
	 *
	 * @return bool
	 */
	public function isMan():bool {
		return $this->gender() == NCL::$MAN;
	}


	/**
	 * Имя женского рода?
	 *
	 * @return bool
	 */
	public function isWoman():bool {
		return $this->gender() == NCL::$WOMAN;
	}


	/**
	 * Преобразование в строку
	 *
	 * @return string
	 */
	public function __toString():string {
		return $this->nominative();
	}
}