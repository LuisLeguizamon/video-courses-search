import React from "react";

export default function Results(props) {
    const category = props.category;
    const videos = props.videos;

    const videosTitle = videos.map((item) => {
        return <li className="p-5" key={item.videoId}>{item.videoTitle}</li>;
    });

    return (
        <>
            <div className="m-5 p-5">
                <h5 className="bg-slate-100 m-5 p-5 text-center">{category}</h5>
                <ul>{videosTitle}</ul>
            </div>
        </>
    );
}
