import React from "react";
import Header from "@/Layouts/Header";

export default function Results(props) {
    const videoId = props.videoId;
    const url = "https://www.youtube.com/embed/"+videoId;

    return (
        <>
            <Header></Header>
            <div className="grid grid-cols-1 mt-20">
                <div className="m-auto">
                    <iframe
                        width="800"
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
