import './App.css';

function App() {
  return (
    <div class="min-h-screen bg-secondary">
		<div class="navbar">
  			<div class="flex-1">
    			<a class="btn btn-ghost normal-case text-xl">Bookify</a>
  			</div>
  			<div class="flex-none">
    			<div class="dropdown dropdown-end">
      				<label tabindex="0" class="btn btn-ghost btn-circle avatar">
        			<div class="w-10 rounded-full bg-primary"></div>
      				</label>
      				<ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
        			<li><a class="justify-between">Sign Up</a></li>
        			<li><a>Login</a></li>
      				</ul>
    			</div>
			</div>
  		</div>

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
  );
}
export default App;
