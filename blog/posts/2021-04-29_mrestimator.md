---
date: 2021-04-29
last_edit: 2023-11-23
icon: "./media/mrestimator.png"
tags: [research, neuro]
---

# Mr. Estimator

<!-- <img src="./media/mrestimator.png" class="img-dyn left" style="max-width: 15% !important;" alt="Mr. Estimator"> -->

_Mister Estimator_ is an open-source python toolbox I wrote as my first project in Viola's group. It allows you to estimate the intrinsic timescale, e.g. in electrophysiologal data.

Originally intended for the analysis of time series from neuronal spiking activity, it works on a wide range of systems where subsampling is a problem (often, it is impossible to observe the whole system in full detail). Applications range from epidemic spreading to any system that can be represented by an autoregressive process.

Why care about this timescale? In general, it serves as a proxy for the distance to criticality and quantifies a system’s dynamic working point.
And in the context of neuroscience, you can think of it as the duration over which any perturbation lingers within the network; it has been used as a key observable to uncover the functional hierarchy across primate cortex, and it serves as a measure of working memory.

See the repository on [GitHub](https://github.com/Priesemann-Group/mrestimator) for more details.


