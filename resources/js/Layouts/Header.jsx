import Dropdown from '@/Components/Dropdown';
import React from 'react';

function Header(props) {
  let loginContent;
  let registerContent;

  if (props.auth.user) {
    loginContent = (
        <div>
            <Dropdown>
                <Dropdown.Trigger>
                    <span className="inline-flex rounded-md">
                        <button
                            type="button"
                            className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150"
                        >
                            {props.auth.user.name}

                            <svg
                                className="ml-2 -mr-0.5 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clipRule="evenodd"
                                />
                            </svg>
                        </button>
                    </span>
                </Dropdown.Trigger>

                <Dropdown.Content>
                    <Dropdown.Link href={route("profile.edit")}>
                        Profile
                    </Dropdown.Link>
                    <Dropdown.Link
                        href={route("logout")}
                        method="post"
                        as="button"
                    >
                        Log Out
                    </Dropdown.Link>
                </Dropdown.Content>
            </Dropdown>
        </div>
    );
  } else {
    loginContent = <div>
                    <li><a href={route('login')} className="mr-6 font-medium hover:text-gray-200">Login</a></li>
                  </div>;
    registerContent = <div>
                        <li><a href={route('register')} className="mr-6 font-medium hover:text-gray-200">Register</a></li>
                      </div>;
  }

  return (
    <header className="bg-indigo-600 text-white text-center">
      <nav className="container mx-auto flex items-center justify-between p-4">
        <a href="/" className="font-bold text-xl text-slate-100">
            <img src="/logo.png" width={100} height={100} alt="logo" />
            Home
        </a>
        <div className="">
            <a href={route('search.favorites.list')} active={route().current('search.favorites.list')}
              className="items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                <i className="fa-regular fa-star mr-1 text-indigo-600"></i>
                Favorites
            </a>
        </div>
        <ul className="flex items-center">
          {loginContent}
          {registerContent}
        </ul>
      </nav>
    </header>
  );
}

export default Header;