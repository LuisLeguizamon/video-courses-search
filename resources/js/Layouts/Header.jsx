import React from 'react';

function Header() {
  return (
    <header className="bg-indigo-600 text-white text-center">
      <nav className="container mx-auto flex items-center justify-between p-4">
        <a href="/" className="font-bold text-xl text-slate-100">
            <img src="/logo.png" width={100} height={100} alt="logo" />
            Home
        </a>
        <ul className="flex items-center">
          <li><a href={route('login')} className="mr-6">Login</a></li>
          <li><a href={route('register')} className="mr-6">Register</a></li>
        </ul>
      </nav>
    </header>
  );
}

export default Header;