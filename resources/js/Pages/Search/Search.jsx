import React from "react";




export default function Search(props){
    const areas = props.areas;

    const areasNames = [];

    areas.forEach((data, index) => {
        areasNames.push(<li class="bg-slate-100 m-5 p-5 text-center" key={index}>{data}</li>)
    });

    return (
        <>
            <div class="grid grid-cols-4 gap-4">
                <ul class="m-5 p-5">
                    {areasNames}
                </ul>
            </div>
        </>
    );
}