import React from 'react'

const home = () => {
  return (
    <div class="min-h-screen bg-secondary">

    <div class="hero-content ">
      <div class="mt-16 ml-36">
        <h1 class="text-9xl font-bold text-primary">Bookify</h1>
        <h2 class="text-3xl">The Comprehensive Vacation Planner</h2>
        <div class=" mt-6 ml-8 max-w-xs">
        <div class="form-control">
                  <input type="text" placeholder="Dream vacation spot..." class="input w-full" />
            </div>
            <div class="form-control mt-4">
                  <button class="btn btn-primary">Get Started</button>
            </div>
            </div>
        </div>
    </div>
</div>
)
}

export default home