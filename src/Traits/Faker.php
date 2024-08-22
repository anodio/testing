<?php

namespace Anodio\Testing\Traits;

use Faker\Factory;

trait Faker
{
    protected ?\Faker\Generator $faker = null;

    /**
     * Get the default Faker instance for a given locale.
     *
     * @param  string|null  $locale
     * @return \Faker\Generator
     */
    protected function faker($locale = null)
    {
        if (!$locale) {
            if (!$this->faker) {
                $this->faker = $this->makeFaker($locale);
            }
        } else {
            $this->faker = $this->makeFaker($locale);
        }
        return $this->faker;
    }

    /**
     * Create a Faker instance for the given locale.
     *
     * @param  string|null  $locale
     * @return \Faker\Generator
     */
    protected function makeFaker($locale = null)
    {
        return Factory::create($locale ?? Factory::DEFAULT_LOCALE);
    }
}