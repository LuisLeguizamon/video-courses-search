import React from "react";
import { router } from '@inertiajs/react';

export default function Results(props) {
    const category = props.category;
    const videos = props.videos;

    let goToVideo = (url) => router.get(url);

    const videosTitle = videos.map((item) => {
        const url = route("search.show_video", { 'videoId': item.videoId });
        return (
            <li onClick={ () => goToVideo(url) }
                className="bg-white capitalize cursor-pointer mt-5 p-5 h-auto w-full rounded shadow-2xl shadow-gray-500/20
                           hover:bg-slate-100 transition duration-300 ease-in-out"
                key={item.videoId}>
                {item.videoTitle}
            </li>
        );
    });

    return (
        <>
            <div className="bg-gray-100 items-center min-h-screen">
                <div className="grid grid-cols-4 gap-2 p-5">
                    <div className="col-span-1 capitalize font-extrabold p-8 text-gray-700 text-center text-5xl">
                        {category}
                    </div>
                    <div className="col-span-3">
                        <ul>{videosTitle}</ul>
                    </div>
                </div>
            </div>
        </>
    );
}
