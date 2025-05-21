<?php

namespace Piwind\UsernameBlacklist;

use Flarum\Locale\Translator;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;

class WhitelistRule implements Rule
{
    protected $settings;
    protected $translator;

    public function __construct(SettingsRepositoryInterface $settings, Translator $translator)
    {
        $this->settings = $settings;
        $this->translator = $translator;
    }

    public function passes($attribute, $value)
    {
        $regex = (bool)$this->settings->get('piwind-username-blacklist.regex');

        foreach (explode("\n", $this->settings->get('piwind-username-blacklist.whitelist')) as $line) {
            $expression = trim($line);

            // Do not evaluate empty lines
            if (!$expression) {
                continue;
            }

            if ($this->check($value, $expression, $regex)) {
                return true;
            }
        }

        $blacklist = trim($this->settings->get('piwind-username-blacklist.blacklist'));

        // If no blacklist is provided, fail all other values
        if (!$blacklist) {
            return false;
        }

        foreach (explode("\n", $blacklist) as $line) {
            $expression = trim($line);

            if ($this->check($value, $expression, $regex)) {
                return false;
            }
        }

        return true;
    }

    protected function check($value, string $expression, bool $regex): bool
    {
        if ($regex) {
            return preg_match($expression, $value) === 1;
        }

        return strtolower($value) === strtolower($expression);
    }

    public function message()
    {
        return $this->settings->get('piwind-username-blacklist.message') ?: $this->translator->trans('piwind-username-blacklist.api.fallbackMessage');
    }
}
