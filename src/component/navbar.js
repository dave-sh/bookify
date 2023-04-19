import React from 'react'
import { Link } from 'react-router-dom'


const navbar = () => {
  return (
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
                    <div class="links">
                    <Link to="/home"> Home </Link>
                    <Link to="/vacation"> Vacation </Link>
                    <Link to="/vacations"> Vacations </Link>
                    </div>
                  </ul>
            </div>
        </div>
      </div>
  )
}

export default navbar