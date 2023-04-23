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
        let custombg = '';
        switch (data) {
            case 'sports':
                custombg = 'bg-gradient-to-r from-cyan-500 to-blue-500';
                break;
            case 'finance':
                custombg = 'bg-gradient-to-r from-cyan-500 to-emerald-500';
                break;
            case 'leadership':
                custombg = 'bg-gradient-to-r from-sky-500 to-blue-800';
                break;
            case 'coding':
                custombg = 'bg-gradient-to-r from-blue-500 to-purple-500';
                break;
            default:
                break;
        };

        areasNames.push(
            <a
                onClick={ () => searchByCategory(data) }
                className={`bg-white capitalize cursor-pointer font-medium p-16 rounded shadow-2xl
                           shadow-gray-500/20 text-gray-100 text-center text-2xl w-full h-full
                           ${custombg}
                           hover:from-blue-500 hover:to-cyan-500 hover:text-white`}
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