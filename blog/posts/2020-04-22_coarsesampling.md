---
date: 2020-04-22
last_edit: 2023-11-23
tags: [research, neuro]
---

# Criticality lies in the sampling.


For decades neuroscientists have argued that the cortex might operate at a critical point of a (second-order, non-equilibrium) phase transition.
Operating at such a critical point would benefit neuronal networks because it enables optimal information-processing and useful quantities such as the correlation length are maximized.

<img src="./media/coarsesampling.webp" class="img-dyn w-half left" alt="coarse-sampling">

The evidence that supports or contradicts this hypothesis of criticality in the brain often derives from measurements of neuronal avalanches.
If a system is critical, the probability distributions of the size (and duration) of these avalanches follow a power law.
Thus, power-law distributions are a common way to check if a system is critical.

Controversially, the results of studies that build on observing power-laws in the neuronal avalanches vary immensely throughout the literature; some (and I am skipping many details) find the brain in a critical state and others in a subcritical state.

We found that the cause of the controversy lies in the way the avalanches are _sampled_. If an electrode's signal is used directly (e.g. LFP), then many neurons contribute to the signal, and the events that make up an avalanche have many contributions. Because of the many contributions, spurious correlations are introduced, and this type of _coarse-sampling_ can produce power-law distributions --- even when the observed system is not critical.

[[Plos CB]](https://journals.plos.org/ploscompbiol/article?id=10.1371/journal.pcbi.1010678)
[[ArXiv]](https://arxiv.org/abs/1910.09984)
[[GitHub]](https://github.com/Priesemann-Group/criticalavalanches)
