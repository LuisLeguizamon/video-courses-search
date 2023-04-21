import React from "react";
import { Head } from '@inertiajs/react';
import Header from "@/Layouts/Header";

export default function Results({auth, videoId}) {

    const url = "https://www.youtube.com/embed/"+videoId;

    return (
        <>
            <Header auth={auth}></Header>
            <Head title="video" />
            <div className="grid grid-cols-1 mt-20">
                <div className="m-5">
                    <iframe
                        width="100%"
                        height="315"
                        src={url}
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </>
    );
}
