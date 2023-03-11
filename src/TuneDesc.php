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
        'found' => [18, 'found'],
        'expired' => [19, 'expired'],
        'removal' => [20, 'removal'],
        'creation' => [21, 'creation'],
        'update' => [22, 'update'],
        'search' => [23, 'search'],
        'reading' => [24, 'reading'],
        'receiving' => [25, 'receiving'],
        'transmitting' => [26, 'transmitting'],
        'defined' => [27, 'defined'],
        'undefined' => [27, 'undefined']
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

    public function context($something, string $key = 'default'): self
    {
        $this->exception->setContext($something, $key);

        return $this;
    }

    public function wrong(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function isWrong(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function areWrong(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function incorrect(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function isIncorrect(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function areIncorrect(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function invalid(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function isInvalid(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function areInvalid(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function no(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function not(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function isnt(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function arent(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function dont(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function doesnt(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function failed(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function exist(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function exists(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function empty(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function isEmpty(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function areEmpty(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function need(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function already(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function enough(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function ready(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function tooMuch(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function tooMany(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function required(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function denied(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function rejected(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function same(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function areSame(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function found(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function expired(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function removal(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function creation(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function update(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function search(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function reading(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function receiving(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    public function transmitting(?string $whatBefore = null, ?string $whatAfter = null): self
    {
        $this->addPart(__FUNCTION__, $whatBefore, $whatAfter);

        return $this;
    }

    protected function addPart(string $phraseKey, ?string $whatBefore, ?string $whatAfter)
    {
        $this->initMessagePart();
        $this->setPhraseKey($phraseKey);
        $this->findPhraseDesc();

        $this->addPhrasePart($whatBefore);
        $this->addPhraseBase();
        $this->addPhrasePart($whatAfter);

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