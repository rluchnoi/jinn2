import React from 'react';
import Header from './Header';
import Hls from 'hls.js';
import Plyr from 'plyr';
import 'plyr/dist/plyr.css';


import { useEffect } from 'react';

const Film = ({ film }) => {
    useEffect(() => {
        const video = document.getElementById('player');
        const source = 'http://jinn2.devs/hls/index.m3u8';
        const defaultOptions = {};

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
                    default: availableQualities[availableQualities.length - 1],
                    options: availableQualities,
                    forced: true,
                    onChange: (e) => updateQuality(e)
                }

                new Plyr(video, defaultOptions);
            });

            hls.attachMedia(video);
            window.hls = hls;

        } else {
            console.log('Not supported')
        }

        function updateQuality(quality) {
            window.hls.levels.forEach((level, levelIndex) => {
                if (level.height === quality) {
                    window.hls.currentLevel = levelIndex;
                }
            })
        }

    }, []);

    return (
        <>
            <Header/>

            <div className='film'>

                <div className='filmInfo'>
                    <div className='filmImageName'>
                        <div className='filmImage'>
                            <img src={film.image} alt="Not Found"/>
                        </div>

                        <div className='filmName'>
                            {film.name}
                        </div>
                    </div>
                </div>

                <div className='player'>
                    <video
                        id="player"
                        controls
                    ></video>
                </div>

                
            </div>
        </>
    )
}

export default Film