<p>{{ __('exercises/1_6.description.1') }}</p>
<pre><code>(define (new-if predicate then-clause else-clause)
  (cond (predicate then-clause)
        (else else-clause)))</code></pre>
<p>{{ __('exercises/1_6.description.2') }}</p>
<pre><code>(new-if (= 2 3) 0 5)
5

(new-if (= 1 1) 0 5)
0</code></pre>
<p>{{ __('exercises/1_6.description.3') }}</p>
<code><pre>
(define (sqrt-iter guess x)
  (new-if (good-enough? guess x)
          guess
          (sqrt-iter (improve guess x)
                     x)))
</pre></code>
<p>{{ __('exercises/1_6.description.4') }}</p>