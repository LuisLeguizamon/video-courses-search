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
            <li
                onClick={ () => searchByCategory(data) }
                className="bg-slate-100 m-5 p-5 text-center"
                key={index}>
                {data}
            </li>)
    });

    return (
        <>
            <div className="grid grid-cols-4 gap-4">
                <ul className="m-5 p-5">
                    {areasNames}
                </ul>
            </div>
        </>
    );
}