<?php declare(strict_types = 1);

namespace RavenFlux\VairogsHelper\Generator;

use ReflectionException;
use Twig;
use Twig\Extension\AbstractExtension;
use Vairogs\Component\Utils\Annotation;
use Vairogs\Component\Utils\Helper\Generator;
use Vairogs\Component\Utils\Twig\Helper;
use Vairogs\Component\Utils\Twig\TwigTrait;
use Vairogs\Component\Utils\Vairogs;

class Extension extends AbstractExtension
{
    use TwigTrait;

    /**
     * @var string
     */
    private const SUFFIX = '_generator_';

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getFilters(): array
    {
        return $this->makeArray(Helper::getFilterAnnotations(Generator::class, Annotation\TwigFilter::class), Vairogs::RAVEN . self::SUFFIX, Twig\TwigFilter::class);
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getFunctions(): array
    {
        return $this->makeArray(Helper::getFilterAnnotations(Generator::class, Annotation\TwigFunction::class), Vairogs::RAVEN . self::SUFFIX, Twig\TwigFunction::class);
    }
}
