<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

class TuneDesc implements Interfaces\DescTuner
{
    const UNKNOWN_PHRASE_CODE = 99;

    protected array $codes = [
        'wrong' => [1, 'wrong'],
        'isWrong' => [1, 'is wrong'],
        'areWrong' => [1, 'are wrong'],
        'incorrect' => [2, 'incorrect'],
        'isIncorrect' => [2, 'is incorrect'],
        'areIncorrect' => [2, 'are incorrect'],
        'invalid' => [3, 'invalid'],
        'isInvalid' => [3, 'is invalid'],
        'areInvalid' => [3, 'are invalid'],
        'no' => [4, 'no'],
        'not' => [5, 'not'],
        'isnt' => [5, 'is not'],
        'arent' => [5, 'are not'],
        'dont' => [5, 'do not'],
        'doesnt' => [5, 'does not'],
        'failed' => [6, 'failed'],
        'exist' => [7, 'exist'],
        'exists' => [7, 'exists'],
        'empty' => [8, 'empty'],
        'isEmpty' => [8, 'is empty'],
        'areEmpty' => [8, 'are empty'],
        'need' => [9, 'need'],
        'already' => [10, 'already'],
        'enough' => [11, 'enough'],
        'ready' => [12, 'ready'],
        'tooMuch' => [13, 'too much'],
        'tooMany' => [13, 'too many'],
        'required' => [14, 'required'],
        'denied' => [15, 'denied'],
        'rejected' => [16, 'rejected'],
        'same' => [17, 'the same'],
        'areSame' => [17, 'are the same'],
    ];

    protected ExceptionBuilder $builder;
    protected UniException $exception;

    protected string $phraseKey;
    protected array $phraseDesc;

    protected array $messagePartPhrase;

    public function __construct(ExceptionBuilder $builder, UniException $exception)
    {
        $this->builder = $builder;
        $this->exception = $exception;
    }

    public function getCodes(): array
    {
        return $this->codes;
    }

    public function b(): BuildException
    {
        return $this->builder;
    }

    public function internal(): self
    {
        $this->exception->setInternal(true);

        return $this;
    }

    public function context($something, string $key='default'): self {
        $this->exception->setContext($something, $key);

        return $this;
    }

    public function wrong(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function isWrong(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function areWrong(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function incorrect(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function isIncorrect(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function areIncorrect(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function invalid(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function isInvalid(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function areInvalid(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function no(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function not(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function isnt(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function arent(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function dont(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function doesnt(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function failed(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function exist(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function exists(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function empty(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function isEmpty(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function areEmpty(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function need(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function already(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function enough(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function ready(): self
    {
        $this->addWithout(__FUNCTION__);

        return $this;
    }

    public function tooMuch(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function tooMany(?string $what = null): self
    {
        $this->addWithAfter(__FUNCTION__, $what);

        return $this;
    }

    public function required(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function denied(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function rejected(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function same(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    public function areSame(?string $what = null): self
    {
        $this->addWithBefore(__FUNCTION__, $what);

        return $this;
    }

    protected function addWithBefore(string $phraseKey, ?string $what)
    {
        $this->initMessagePart();
        $this->setPhraseKey($phraseKey);
        $this->findPhraseDesc();

        $this->addPhrasePart($what);
        $this->addPhraseBase();

        $this->publishMessagePart();
    }

    protected function addWithAfter(string $phraseKey, ?string $what)
    {
        $this->initMessagePart();
        $this->setPhraseKey($phraseKey);
        $this->findPhraseDesc();

        $this->addPhraseBase();
        $this->addPhrasePart($what);

        $this->publishMessagePart();
    }

    protected function addWithout(string $phraseKey)
    {
        $this->initMessagePart();
        $this->setPhraseKey($phraseKey);
        $this->findPhraseDesc();

        $this->addPhraseBase();

        $this->publishMessagePart();
    }

    protected function initMessagePart()
    {
        $this->messagePartPhrase = [];
    }

    protected function setPhraseKey(string $phraseKey)
    {
        $this->phraseKey = $phraseKey;
    }

    protected function findPhraseDesc()
    {
        if (isset($this->codes[$this->phraseKey])) {
            $this->phraseDesc = $this->codes[$this->phraseKey];
        } else {
            $this->phraseDesc = [self::UNKNOWN_PHRASE_CODE, ''];
        }
    }

    protected function addPhraseBase()
    {
        $this->messagePartPhrase[] = $this->phraseDesc[1];
    }

    protected function addPhrasePart(?string $part)
    {
        if (is_null($part)) return;

        $this->messagePartPhrase[] = $part;
    }

    protected function publishMessagePart()
    {
        $this->exception->addMessagePart([
            $this->phraseDesc[0],
            $this->messagePartPhrase
        ]);
    }

}