<?php

/**
 * This file is part of Collision.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace NunoMaduro\Collision;

use Whoops\Exception\Frame;
use Whoops\Exception\Inspector;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use NunoMaduro\Collision\Contracts\Writer as WriterContract;
use NunoMaduro\Collision\Contracts\Highlighter as HighlighterContract;
use NunoMaduro\Collision\Contracts\ArgumentFormatter as ArgumentFormatterContract;

/**
 * This is an Collision Writer implementation.
 *
 * @author Nuno Maduro <enunomaduro@gmail.com>
 */
class Writer implements WriterContract
{
    /**
     * The number of frames if no verbosity is specified.
     */
    const VERBOSITY_NORMAL_FRAMES = 1;

    /**
     * Holds an instance of the Output.
     *
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * Holds an instance of the Argument Formatter.
     *
     * @var \NunoMaduro\Collision\Contracts\ArgumentFormatter
     */
    protected $argumentFormatter;

    /**
     * Holds an instance of the Highlighter.
     *
     * @var \NunoMaduro\Collision\Contracts\Highlighter
     */
    protected $highlighter;

    /**
     * Ignores traces where the file string matches one
     * of the provided regex expressions.
     *
     * @var string[]
     */
    protected $ignore = [];

    /**
     * Declares whether or not the trace should appear.
     *
     * @var bool
     */
    protected $showTrace = true;

    /**
     * Declares whether or not the editor should appear.
     *
     * @var bool
     */
    protected $showEditor = true;

    /**
     * Creates an instance of the writer.
     *
     * @param \Symfony\Component\Console\Output\OutputInterface|null $output
     * @param \NunoMaduro\Collision\Contracts\ArgumentFormatter|null $argumentFormatter
     * @param \NunoMaduro\Collision\Contracts\Highlighter|null $highlighter
     */
    public function __construct(
        OutputInterface $output = null,
        ArgumentFormatterContract $argumentFormatter = null,
        HighlighterContract $highlighter = null
    ) {
        $this->output = $output ?: new ConsoleOutput;
        $this->argumentFormatter = $argumentFormatter ?: new ArgumentFormatter;
        $this->highlighter = $highlighter ?: new Highlighter;
    }

    /**
     * {@inheritdoc}
     */
    public function write(Inspector $inspector): void
    {
        $this->renderTitle($inspector);

        $frames = $this->getFrames($inspector);

        $editorFrame = array_shift($frames);
        if ($this->showEditor && $editorFrame !== null) {
            $this->renderEditor($editorFrame);
        }

        if ($this->showTrace && ! empty($frames)) {
            $this->renderTrace($frames);
        } else {
            $this->output->writeln('');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function ignoreFilesIn(array $ignore): WriterContract
    {
        $this->ignore = $ignore;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function showTrace(bool $show): WriterContract
    {
        $this->showTrace = $show;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function showEditor(bool $show): WriterContract
    {
        $this->showEditor = $show;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setOutput(OutputInterface $output): WriterContract
    {
        $this->output = $output;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * Returns pertinent frames.
     *
     * @param  \Whoops\Exception\Inspector $inspector
     *
     * @return array
     */
    protected function getFrames(Inspector $inspector): array
   