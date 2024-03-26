import React from 'react';
import { useEffect } from 'react';
import { useState } from 'react';

import Hls from 'hls.js';
import Plyr from 'plyr';
import 'plyr/dist/plyr.css';

const Film = ({ film }) => {
    function renderPlayer() {
        const video = document.getElementById('player');
        const defaultOptions = {};
        const source = film.video;

        if (Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource(source);
            hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
                const availableQualities = hls.levels.map((level) => level.height);

                defaultOptions.controls = [
                    'play-large',
                    'restart',
                    'rewind',
                    'play',
                    'fast-forward',
                    'progress',
                    'current-time',
                    'duration',
                    'mute',
                    'volume',
                    'settings',
                    'pip',
                    'fullscreen'
                ],

                defaultOptions.quality = {
                    default: availableQualities[0],
                    options: availableQualities,
                    forced: true,
                    onChange: (e) => updateQuality(e)
                }

                new Plyr(video, defaultOptions);
            });

            hls.attachMedia(video);
            window.hls = hls;

        } else {
            console.log('Not supported');
        }

        function updateQuality(quality) {
            window.hls.levels.forEach((level, levelIndex) => {
                if (level.height === quality) {
                    window.hls.currentLevel = levelIndex;
                }
            })
        }
    }

    useEffect(() => {
        if (film) {
            renderPlayer();
        }
    }, [film]);

    if (!film) {
        return <></>
    }

    return (
        <>
            <div className='film'>
                <div className='firstColumn'>
                    <div className='firstColumnContentWrapper'>
                        <div className='filmName'>
                            {film.name}
                        </div>

                        <div className='filmImage'>
                            <img src={film.image} alt="Not Found"/>
                        </div>

                        <div className='filmInfo'>
                            <div>
                                Released: {film.year}
                            </div>
                            <div>
                                Director: {film.director.name}
                            </div>
                            <div>
                                Actors: {film.actors.map((actor) => actor.name).join(', ')}
                            </div>
                        </div>
                    </div>
                </div>

                <div className='secondColumn'>
                    <div className='playerWrapper'>
                        <video
                            id="player"
                            controls
                        ></video>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Film