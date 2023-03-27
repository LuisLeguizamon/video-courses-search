import React from "react";

export default function Results(props) {
    const category = props.category;
    const videos = props.videos;

    const videosTitle = videos.map((item) => {
        const url = route("search.show_video", { 'videoId': item.videoId });
        return (
            <li className="bg-white capitalize mt-5 p-5 h-auto w-full rounded shadow-2xl shadow-gray-500/20"
                key={item.videoId}>
                <a href={url}>{item.videoTitle}</a>
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
