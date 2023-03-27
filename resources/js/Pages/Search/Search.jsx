import React from "react";
import { router } from '@inertiajs/react'

export default function Search(props){
    const areas = props.areas;

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
            <div className="bg-gray-100 items-center min-h-screen">
                <div className="grid grid-cols-2 gap-8 p-20">
                    {areasNames}
                </div>
            </div>
        </>
    );
}