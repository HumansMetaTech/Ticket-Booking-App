const counters = document.querySelectorAll(".num");

counters.forEach(counter => {
  let target = +counter.dataset.target;
  let startingCount = 0;
  let duration = 1000; // Duration in milliseconds (1 seconds)
  let increment = (target - startingCount) / (duration / 10); // Dynamic increment per 10ms
  let currentCount = startingCount;

  function easeOutCubic(t) {
    return 1 - Math.pow(1 - t, 3);
  }

  function updateCount() {
    currentCount += increment;
    counter.innerText = Math.floor(currentCount);

    if (currentCount < target) {
      const progress = currentCount / target;
      const easedProgress = easeOutCubic(progress);
      const delay = 10 * easedProgress; // Apply easing to the delay as well
      setTimeout(updateCount, delay);
    } else {
      counter.innerText = target;
    }
  }

  setTimeout(updateCount, 900);
});
