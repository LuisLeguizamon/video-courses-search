import React from "react";
import { router } from '@inertiajs/react';
import { Head } from '@inertiajs/react';
import Header from "@/Layouts/Header";

export default function Home({ auth, areas }){    
    const areasNames = [];

    const searchByCategory = (data) => {
        const url = route("search.list");
        router.get(url, { category: data });
    };

    areas.forEach((data, index) => {
        areasNames.push(
            <a
                onClick={ () => searchByCategory(data) }
                className="bg-white capitalize cursor-pointer font-medium p-16 rounded shadow-2xl
                           shadow-gray-500/20 text-gray-700 text-center text-xl w-full h-full
                           hover:bg-slate-100 transition duration-300 ease-in-out"
                key={index}>
                {data}
            </a>)
    });

    return (
        <>
            <Header auth={auth}></Header>
            <Head title="Home" />
            <div className="bg-gray-100 items-center min-h-screen">
                <div className="grid md:grid-cols-2 sm:grid-cols-1 gap-8 p-20">
                    {areasNames}
                </div>
            </div>
        </>
    );
}