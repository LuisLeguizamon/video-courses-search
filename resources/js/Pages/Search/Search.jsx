import React from "react";

const areas = ['deportes', 'finanzas', 'liderazgo', 'programación'];

const areasNames = [];

areas.forEach((data) => {
    areasNames.push(<li class="bg-slate-100 m-5 p-5 text-center">{data}</li>)
})

export default function Search(){
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