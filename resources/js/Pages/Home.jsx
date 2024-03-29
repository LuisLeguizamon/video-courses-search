import React, { useEffect, useState } from "react";
import { router } from '@inertiajs/react';
import { Head } from '@inertiajs/react';
import Header from "@/Layouts/Header";
import Spinner from "@/Components/Spinner";

export default function Home({ auth, areas }){
    const[loading, setLoading] = useState(true);

    useEffect( () => {
        setLoading(false);
    });

    let bodyContent;

    const areasNames = [];

    const searchByCategory = (data) => {
        const url = route("courses.list");
        router.get(url, { category: data });
    };

    if (loading) {
        bodyContent = (
            <Spinner></Spinner>
        );
    } else {
        bodyContent = 
        <div className="bg-gray-100 items-center min-h-screen">
            <div className="grid md:grid-cols-2 sm:grid-cols-1 gap-8 p-20">
                {areasNames}
            </div>
        </div>;
    }
    
    areas.forEach((data, index) => {
        if (index%2 == 0) {
            areasNames.push(
                <a
                    onClick={ () => searchByCategory(data.area) }
                    className={`bg-white capitalize cursor-pointer font-medium p-16 rounded shadow-2xl
                            shadow-gray-500/20 text-gray-100 text-center text-2xl w-full h-full
                            bg-gradient-to-r from-cyan-500 to-blue-500
                            hover:from-blue-500 hover:to-cyan-500 hover:text-white`}
                    key={index}>
                    {data.area}
                </a>)
        } else {
            areasNames.push(
                <a
                    onClick={ () => searchByCategory(data.area) }
                    className={`bg-white capitalize cursor-pointer font-medium p-16 rounded shadow-2xl
                            shadow-gray-500/20 text-gray-100 text-center text-2xl w-full h-full
                            bg-gradient-to-r from-cyan-500 to-emerald-500
                            hover:from-blue-500 hover:to-cyan-500 hover:text-white`}
                    key={index}>
                    {data.area}
                </a>)
        }
    });

    return (
        <>
            <Header auth={auth}></Header>
            <Head title="Home" />
            {bodyContent}
        </>
    );
}