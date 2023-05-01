import React, { useState } from "react";
import { router } from '@inertiajs/react';
import { Head } from '@inertiajs/react';
import Header from "@/Layouts/Header";

export default function Favorites({auth, videos}) {

    const[slicedVideos, setSlicedVideos] = useState(videos.slice(0,5));//set initial value to the first 5 videos

    let goToVideo = (url) => router.get(url);

    const numberOfPages = videos.length / 5;//divide in pages of 5 items

    const buttons = [];
    for (let index = 0; index < numberOfPages; index++) {
        buttons.push(
            <button
                key={index}
                className="bg-white m-5 p-5 hover:bg-slate-100"
                onClick={() => getCurrentVideos(index)}
            >
                {index + 1}
            </button>
        );
    }

    let getCurrentVideos = (index) => {
        setSlicedVideos(videos.slice(index*5, index*5+5));
    };
    
    const videosTitle = slicedVideos.map((item) => {
        const url = route("courses.show", { 'videoId': item.video_id, 'title': item.title });
        return (
            <li onClick={ () => goToVideo(url) }
                className="bg-white capitalize cursor-pointer mt-5 p-5 h-auto w-full rounded shadow-2xl shadow-gray-500/20
                           hover:bg-slate-100 transition duration-300 ease-in-out"
                key={item.video_id}>
                {item.title}
            </li>
        );
    });

    return (
        <>
            <Header auth={auth}></Header>
            <Head title="favorites" />
            <div className="bg-gray-100 items-center min-h-screen">
                <div className="grid md:grid-cols-4 sm:grid-gols-1 gap-2 p-5">
                    <div className="col-span-1 capitalize font-extrabold p-8 text-gray-700 text-center text-5xl">
                        Favorites
                    </div>
                    <div className="col-span-3">
                        <ul>{videosTitle}</ul>
                    </div>
                </div>
                <div className="text-center">
                    {buttons}
                </div>
            </div>
        </>
    );
}
