import React from "react";
import { Head } from '@inertiajs/react';
import { router } from '@inertiajs/react';
import Header from "@/Layouts/Header";

export default function Results({auth, favoriteVideo, videoId, videoTitle}) {
    const url = "https://www.youtube.com/embed/"+videoId;

    let favoriteContent;

    function markAsFavorite() {
        router.post(route("favorites.store", {video_id: videoId, video_title: videoTitle}));
    }

    if (auth.user) {
        if (favoriteVideo) {
            favoriteContent = 
                <div className="font-medium text-center text-emerald-500">
                     <button className="bg-slate-100 border border-transparent px-2 py-3 rounded-md text-sm hover:bg-slate-200 transition ease-in-out duration-300"
                        onClick={() => markAsFavorite()}>
                        <i className="fa-regular fa-star mr-1 text-emerald-500"></i>
                        Favorite
                    </button>
                </div>;            
        } else {
            favoriteContent = 
                <div className="text-center">
                    <button className="bg-slate-100 border border-transparent px-2 py-3 rounded-md text-sm hover:bg-slate-200 transition ease-in-out duration-300"
                        onClick={() => markAsFavorite()}>
                        Mark as Favorite
                    </button>
                </div>;
        }
    }
    return (
        <>
            <Header auth={auth}></Header>
            <Head title="video" />
            <div className="grid grid-cols-1 mt-20">
                {favoriteContent}
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
