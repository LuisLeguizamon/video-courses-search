import React from 'react';

function Header(props) {
  let loginContent;
  let registerContent;

  if (props.auth.user) {
    loginContent = <a href={route('profile.edit')}
                      className="mr-20 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                      {props.auth.user.name}
                  </a>;
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