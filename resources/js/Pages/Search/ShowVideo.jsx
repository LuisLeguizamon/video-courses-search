import React from "react";
import { Head } from '@inertiajs/react';
import { router } from '@inertiajs/react';
import Header from "@/Layouts/Header";

export default function Results({auth, videoId}) {

    const url = "https://www.youtube.com/embed/"+videoId;

    let favoriteContent;

    function markAsFavorite() {
        router.post(route("search.mark_favorite_video", {video_id: videoId}));
    }

    if (auth.user) {
        favoriteContent = 
            <div className="text-center">
                <span className="bg-slate-100 border border-transparent px-2 py-3 rounded-md text-sm hover:bg-slate-200 transition ease-in-out duration-300"
                      onClick={() => markAsFavorite()}>
                    Mark as Favorite
                </span>
            </div>;
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
