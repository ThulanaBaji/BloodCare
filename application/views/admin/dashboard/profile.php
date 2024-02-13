<div class="w-full h-full p-3 md:p-6 flex flex-col items-center relative">
    <div class="absolute z-30 top-10 left-1/2 -translate-x-1/2 max-w-xs">
        <div class="mt-3 alert alert-success flex items-center p-2 px-3 text-sm text-green-800 rounded bg-green-200" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-success-text"></div>
        </div>
        <div class="mt-3 alert alert-error flex items-center p-2 px-3 text-sm text-red-900 rounded bg-red-300" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-error-text"></div>
        </div>
    </div>
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">
            <div class="text-center relative border-2 flex items-center w-20 h-20 lg:w-28 lg:h-28 rounded-full overflow-hidden justify-center">
                <img id="profilepreview" class="w-11 md:w-20 lg:w-16 object-center object-cover" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNTAgMjI0LjkyMTcwOTA1ODA5Njg0IiBzdHlsZT0ib3ZlcmZsb3c6IGhpZGRlbjsiIGNsYXNzPSJjc3MtMWo4bzY4ZiI+DQogICAgPGcgaWQ9IlN2Z2pzRzEyNzAiIGZlYXR1cmVrZXk9ImdoWFNwcy0wIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjE4Mjg1NDI1NjYwNTMyNDY0LDAsMCwwLjE4Mjg1NDI1NjYwNTMyNDY0LDY1LjI4NzU4ODMzMzY2NjI5LC0xNS4yNTIzOTg3NTgzNzQxOTEpIiBmaWxsPSIjZTIzZTU3Ij4NCiAgICAgICAgPHBhdGggZD0iTTIzOC4yMzEsMjgwLjE1MSI+PC9wYXRoPg0KICAgICAgICA8cGF0aCBkPSJNNjYxLjI2OCw2MTAuMzIxYy0xMzMuNjItMS4wMjEtMjA5LjAyLTExMi42NzMtMjQwLjk2OS0xNzAuNjA2Yy0zMS45NDUtNTguMDAxLTU5LjE3OC01MS45NTItNTMuMzg0LTc0LjAxNCAgYzkuNC0zNS44NDEsODcuMzk2LDMwLjA4NiwxMjMuMDI2LDcxLjczNmMzNS42MSw0MS42MjEsODYuODQ2LDY5LjMxOCwxNTUuNjI1LDcxLjk1NGMtMjguMzQtNDUuNTY2LTExOC44NjctNzIuNjEzLTkwLjk4Mi04Ny4zMDQgIGMyNS43NjgtMTMuNTc4LDEwNy44NjksMi43ODEsMjIyLjQ4LDUyLjM0NmMzOS4zMTUsMTcuMDA1LDY3LjQwMiw0OC4yNzksODcuMzQsODIuMDM1QzExNjAuNDg2LDIyMS4wMjQsODM2LjM4Mi00Ny40MjYsNjAwLDE1MS4zMjcgIGMtMTE1LjI4NC05Ni45My0yNTEuNDMyLTgyLjczLTMyNi4zMjktMy44MzVjNDIuMzQ1LDEzLjczOSw5NS40ODcsMjMuNzU4LDE1My4wNzEsMjQuMTg0ICBjMTMzLjYxMSwxLjAyMiwyMDkuMDIsMTEyLjY3MiwyNDAuOTU5LDE3MC42MWMzMS45MzgsNTguMDAzLDU5LjE4LDUxLjk1LDUzLjM4NSw3NC4wMTNjLTkuNCwzNS44NC04Ny4zODktMzAuMDg4LTEyMy4wMjUtNzEuNzM2ICBjLTM1LjYxMS00MS42MjEtODYuODQ5LTY5LjMxNy0xNTUuNjI2LTcxLjk1NGMyOC4zMzksNDUuNTY2LDExOC44NzYsNzIuNjExLDkwLjk4MSw4Ny4zMDVjLTI1Ljc1NSwxMy41ODMtMTA3Ljg1Ni0yLjc3NC0yMjIuNDgtNTIuMzQ2Yy0zNy41NDctMTYuMjQtNjQuODU0LTQ1LjQ5Ny04NC42MDEtNzcuNDk5ICBDMTg3LjIxLDM2Mi42MzIsMjY2LjUzOCw1NjcuMDM1LDYwMCw3NjYuNTg4Yzc3LjI2OS00Ni4yNCwxNDAuODgyLTkyLjc0MSwxOTIuNTQ5LTEzOC41NDggIEM3NTQuMzU0LDYxNy43MjMsNzA5LjM1Niw2MTAuNjc4LDY2MS4yNjgsNjEwLjMyMXoiPjwvcGF0aD4NCiAgICA8L2c+DQogICAgPGcgaWQ9IlN2Z2pzRzEyNzEiIGZlYXR1cmVrZXk9ImFuSDFZZS0wIiB0cmFuc2Zvcm09Im1hdHJpeCgzLjUzMDM2MDg1NTU2MDI3MywwLDAsMy41MzAzNjA4NTU1NjAyNzMsLTQuODcxODk1MDE3ODc2NDM3NSwxMjYuMDA2NjU4MTkzMDY3OTkpIiBmaWxsPSIjZTIzZTU3Ij4NCiAgICAgICAgPHBhdGggZD0iTTguMTIgNS43MjAwMDAwMDAwMDAwMDEgYzMuMDI2NiAwIDQuNTQgMS4xNzMzIDQuNTQgMy41MiBjMCAxLjM0NjcgLTAuNjQ2NjYgMi4zNDY2IC0xLjk0IDMgYzAuODggMC4yNTMzNCAxLjUzNjcgMC42OTY2OCAxLjk3IDEuMzMgczAuNjUgMS4zOTY3IDAuNjUgMi4yOSBjMCAxLjI4IC0wLjQ2MzM0IDIuMjkgLTEuMzkgMy4wMyBzLTIuMTQzNCAxLjExIC0zLjY1IDEuMTEgbC02LjkyIDAgbDAgLTE0LjI4IGw2Ljc0IDAgeiBNNy43MiAxMS41IGMxLjI2NjcgMCAxLjkgLTAuNTY2NjYgMS45IC0xLjcgYzAgLTEuMDkzMyAtMC43MDY2NiAtMS42NCAtMi4xMiAtMS42NCBsLTIuOTggMCBsMCAzLjM0IGwzLjIgMCB6IE03LjkgMTcuNTYgYzEuNTMzMyAwIDIuMyAtMC42MjY2NiAyLjMgLTEuODggYzAgLTEuMzYgLTAuNzQ2NjYgLTIuMDQgLTIuMjQgLTIuMDQgbC0zLjQ0IDAgbDAgMy45MiBsMy4zOCAwIHogTTE4LjA4IDUuNzIwMDAwMDAwMDAwMDAxIGwwIDE0LjI4IGwtMi44NCAwIGwwIC0xNC4yOCBsMi44NCAwIHogTTI1LjM0MDAwMDAwMDAwMDAwMyA5LjM4IGMxLjY1MzMgMCAyLjk2IDAuNTAzMzQgMy45MiAxLjUxIHMxLjQ0IDIuMzIzNCAxLjQ0IDMuOTUgYzAgMS42NCAtMC40OSAyLjk1NjYgLTEuNDcgMy45NSBzLTIuMjc2NiAxLjQ5IC0zLjg5IDEuNDkgYy0xLjY0IDAgLTIuOTQgLTAuNTAzMzQgLTMuOSAtMS41MSBzLTEuNDQgLTIuMzE2NiAtMS40NCAtMy45MyBjMCAtMS42NjY3IDAuNDkgLTIuOTkzNCAxLjQ3IC0zLjk4IHMyLjI3IC0xLjQ4IDMuODcgLTEuNDggeiBNMjIuODQwMDAwMDAwMDAwMDAzIDE0Ljg0IGMwIDEuMDUzMyAwLjIxMzM0IDEuODY2NiAwLjY0IDIuNDQgczEuMDQ2NyAwLjg2IDEuODYgMC44NiBjMC44NCAwIDEuNDcgLTAuMjkzMzQgMS44OSAtMC44OCBzMC42MyAtMS4zOTMzIDAuNjMgLTIuNDIgYzAgLTEuMDY2NyAtMC4yMTY2NiAtMS44ODY3IC0wLjY1IC0yLjQ2IHMtMS4wNjMzIC0wLjg2IC0xLjg5IC0wLjg2IGMtMC44IDAgLTEuNDEzMyAwLjI4NjY2IC0xLjg0IDAuODYgcy0wLjY0IDEuMzkzMyAtMC42NCAyLjQ2IHogTTM3LjU2IDkuMzggYzEuNjUzMyAwIDIuOTYgMC41MDMzNCAzLjkyIDEuNTEgczEuNDQgMi4zMjM0IDEuNDQgMy45NSBjMCAxLjY0IC0wLjQ5IDIuOTU2NiAtMS40NyAzLjk1IHMtMi4yNzY2IDEuNDkgLTMuODkgMS40OSBjLTEuNjQgMCAtMi45NCAtMC41MDMzNCAtMy45IC0xLjUxIHMtMS40NCAtMi4zMTY2IC0xLjQ0IC0zLjkzIGMwIC0xLjY2NjcgMC40OSAtMi45OTM0IDEuNDcgLTMuOTggczIuMjcgLTEuNDggMy44NyAtMS40OCB6IE0zNS4wNiAxNC44NCBjMCAxLjA1MzMgMC4yMTMzNCAxLjg2NjYgMC42NCAyLjQ0IHMxLjA0NjcgMC44NiAxLjg2IDAuODYgYzAuODQgMCAxLjQ3IC0wLjI5MzM0IDEuODkgLTAuODggczAuNjMgLTEuMzkzMyAwLjYzIC0yLjQyIGMwIC0xLjA2NjcgLTAuMjE2NjYgLTEuODg2NyAtMC42NSAtMi40NiBzLTEuMDYzMyAtMC44NiAtMS44OSAtMC44NiBjLTAuOCAwIC0xLjQxMzMgMC4yODY2NiAtMS44NCAwLjg2IHMtMC42NCAxLjM5MzMgLTAuNjQgMi40NiB6IE01NC44NCA1LjcyMDAwMDAwMDAwMDAwMSBsMCAxNC4yOCBsLTIuNyAwIGwwIC0xLjMyIGwtMC4wNCAwIGMtMC42MTMzNCAxLjA2NjcgLTEuNjYgMS42IC0zLjE0IDEuNiBjLTEuNDI2NyAwIC0yLjU1NjYgLTAuNTIgLTMuMzkgLTEuNTYgcy0xLjI1IC0yLjM2NjYgLTEuMjUgLTMuOTggYzAgLTEuNTczMyAwLjQyMzM0IC0yLjg2IDEuMjcgLTMuODYgczEuOTUgLTEuNSAzLjMxIC0xLjUgYzAuNjI2NjYgMCAxLjIxNjcgMC4xMyAxLjc3IDAuMzkgczAuOTgzMzQgMC42NDMzNCAxLjI5IDEuMTUgbDAuMDQgMCBsMCAtNS4yIGwyLjg0IDAgeiBNNDcuMTYgMTQuODIgYzAgMC45NDY2NiAwLjIyMzMyIDEuNzM2NyAwLjY2OTk4IDIuMzcgczEuMDU2NyAwLjk1IDEuODMgMC45NSBjMC44MTMzNCAwIDEuNDIzMyAtMC4yOTY2NiAxLjgzIC0wLjg5IHMwLjYxIC0xLjQxIDAuNjEgLTIuNDUgcy0wLjIxMzM0IC0xLjg0NjcgLTAuNjQgLTIuNDIgcy0xLjAzMzMgLTAuODYgLTEuODIgLTAuODYgYy0wLjgxMzM0IDAgLTEuNDMgMC4zIC0xLjg1IDAuOSBzLTAuNjMgMS40IC0wLjYzIDIuNCB6IE02My42OCA1LjM4MDAwMDAwMDAwMDAwMSBjMS42NjY3IDAgMy4wNjY2IDAuNDcgNC4yIDEuNDEgczEuNzg2NyAyLjE4MzQgMS45NiAzLjczIGwtMy4wNCAwIGMtMC4xMDY2NiAtMC43MDY2NiAtMC40NiAtMS4zIC0xLjA2IC0xLjc4IHMtMS4yODY3IC0wLjcyIC0yLjA2IC0wLjcyIGMtMS4yMjY3IDAgLTIuMTggMC40NCAtMi44NiAxLjMyIHMtMS4wMiAyLjA3MzQgLTEuMDIgMy41OCBjMCAxLjQ2NjcgMC4zNDMzNCAyLjYzIDEuMDMgMy40OSBzMS42MzY3IDEuMjkgMi44NSAxLjI5IGMwLjkwNjY2IDAgMS42NCAtMC4yNzY2NiAyLjIgLTAuODMgczAuOTA2NjYgLTEuMzQzMyAxLjA0IC0yLjM3IGwzLjA0IDAgYy0wLjE2IDEuODEzMyAtMC44MSAzLjI0IC0xLjk1IDQuMjggcy0yLjU4MzQgMS41NiAtNC4zMyAxLjU2IGMtMi4wOTM0IDAgLTMuNzg2NiAtMC42OSAtNS4wOCAtMi4wNyBzLTEuOTQgLTMuMTYzNCAtMS45NCAtNS4zNSBjMCAtMi4yMTM0IDAuNjQgLTQuMDIzNCAxLjkyIC01LjQzIHMyLjk4IC0yLjExIDUuMSAtMi4xMSB6IE03Ni41NiA5LjM4IGMzLjAxMzQgMC4wMTMzNCA0LjUyIDAuOTkzMyA0LjUyIDIuOTQgbDAgNS40OCBjMCAxLjAxMzMgMC4xMiAxLjc0NjcgMC4zNiAyLjIgbC0yLjg4IDAgYy0wLjEwNjY2IC0wLjMyIC0wLjE3MzMyIC0wLjY1MzM0IC0wLjE5OTk4IC0xIGMtMC44NCAwLjg1MzM0IC0yIDEuMjggLTMuNDggMS4yOCBjLTEuMDggMCAtMS45MzY3IC0wLjI3MzM0IC0yLjU3IC0wLjgyIHMtMC45NSAtMS4zMDY3IC0wLjk1IC0yLjI4IGMwIC0wLjk0NjY2IDAuMyAtMS42OCAwLjkgLTIuMiBjMC42MTMzNCAtMC41NDY2NiAxLjcyNjcgLTAuODkzMzIgMy4zNCAtMS4wNCBjMS4xNDY3IC0wLjEyIDEuODczMyAtMC4yNyAyLjE4IC0wLjQ1IHMwLjQ2IC0wLjQ1NjY2IDAuNDYgLTAuODMgYzAgLTAuNDY2NjYgLTAuMTQgLTAuODEzMzIgLTAuNDIgLTEuMDQgcy0wLjc0NjY2IC0wLjM0IC0xLjQgLTAuMzQgYy0wLjYgMCAtMS4wNTMzIDAuMTIzMzQgLTEuMzYgMC4zNyBzLTAuNDg2NjYgMC42NDMzMiAtMC41NCAxLjE5IGwtMi44NCAwIGMwLjA2NjY2IC0xLjEzMzMgMC41MzMzMiAtMS45OTMzIDEuNCAtMi41OCBzMi4wMjY2IC0wLjg4IDMuNDggLTAuODggeiBNNzQuMiAxNy4wNiBjMCAwLjg4IDAuNTggMS4zMiAxLjc0IDEuMzIgYzEuNTIgLTAuMDEzMzQgMi4yODY2IC0wLjc5MzM0IDIuMyAtMi4zNCBsMCAtMS4xIGMtMC4yMjY2NiAwLjIyNjY2IC0wLjggMC4zOTMzMiAtMS43MiAwLjQ5OTk4IGMtMC44IDAuMDkzMzQgLTEuMzg2NyAwLjI1NjY4IC0xLjc2IDAuNDkwMDIgcy0wLjU2IDAuNjEgLTAuNTYgMS4xMyB6IE04OS4zMjAwMDAwMDAwMDAwMSA5LjM4IGMwLjI0IDAgMC40NDY2OCAwLjAzMzM0IDAuNjIwMDIgMC4xIGwwIDIuNjQgYy0wLjMwNjY2IC0wLjA2NjY2IC0wLjY0NjY2IC0wLjEgLTEuMDIgLTAuMSBjLTEuODY2NyAwIC0yLjggMS4xMDY3IC0yLjggMy4zMiBsMCA0LjY2IGwtMi44NCAwIGwwIC0xMC4zNCBsMi43IDAgbDAgMS45MiBsMC4wNCAwIGMwLjI4IC0wLjY2NjY2IDAuNzIzMzQgLTEuMiAxLjMzIC0xLjYgczEuMjYzMyAtMC42IDEuOTcgLTAuNiB6IE05NS40OCA5LjM4IGMwLjk3MzM0IDAgMS44NCAwLjIyNjY0IDIuNiAwLjY3OTk4IHMxLjM1NjcgMS4xMSAxLjc5IDEuOTcgczAuNjUgMS44NSAwLjY1IDIuOTcgYzAgMC4xMDY2NiAtMC4wMDY2NjAyIDAuMjggLTAuMDIgMC41MiBsLTcuNDYgMCBjMC4wMjY2NiAwLjgyNjY2IDAuMjQzMzIgMS40NyAwLjY0OTk4IDEuOTMgczEuMDMgMC42OSAxLjg3IDAuNjkgYzAuNTIgMCAwLjk5NjY2IC0wLjEzIDEuNDMgLTAuMzkgczAuNzEgLTAuNTc2NjYgMC44MyAtMC45NSBsMi41IDAgYy0wLjczMzM0IDIuMzIgLTIuMzQ2NiAzLjQ4IC00Ljg0IDMuNDggYy0wLjk0NjY2IC0wLjAxMzM0IC0xLjgyMzMgLTAuMjIgLTIuNjMgLTAuNjIgcy0xLjQ1IC0xLjAyMzMgLTEuOTMgLTEuODcgcy0wLjcyIC0xLjgzIC0wLjcyIC0yLjk1IGMwIC0xLjA1MzMgMC4yNDMzNCAtMi4wMTM0IDAuNzMgLTIuODggczEuMTMzMyAtMS41MTMzIDEuOTQgLTEuOTQgczEuNjc2NyAtMC42NCAyLjYxIC0wLjY0IHogTTk3LjY2IDEzLjcxOTk5OTk5OTk5OTk5OSBjLTAuMTMzMzQgLTAuNzczMzQgLTAuMzggLTEuMzMzMyAtMC43NCAtMS42OCBzLTAuODczMzQgLTAuNTIgLTEuNTQgLTAuNTIgYy0wLjY5MzM0IDAgLTEuMjQgMC4xOTY2NiAtMS42NCAwLjU5IHMtMC42MzMzNCAwLjkzIC0wLjcgMS42MSBsNC42MiAwIHoiPjwvcGF0aD4NCiAgICA8L2c+DQogICAgPGcgaWQ9IlN2Z2pzRzEyNzIiIGZlYXR1cmVrZXk9Ilh4VkFnbS0wIiB0cmFuc2Zvcm09Im1hdHJpeCgxLjAwNDg1MjA3MjcyOTcyNiwwLDAsMS4wMDQ4NTIwNzI3Mjk3MjYsMzMuNzk0MTc3NzA0Mzg0NjUsMjAyLjE3MTg1Nzc4NjUwNzI3KSIgZmlsbD0iI2UyM2U1NyI+DQogICAgICAgIDxwYXRoIGQ9Ik0zLjQgMTcuOTYgbDUuOTQgMCBsMCAyLjA0IGwtOC4xNCAwIGwwIC0xNCBsMi4yIDAgbDAgMTEuOTYgeiBNMjMuODM2IDYgbDAgMTQgbC0yLjIgMCBsMCAtMTQgbDIuMiAwIHogTTQ1LjA1MiA4IGwtNi4yNiAwIGwwIDQuMDIgbDUuMTYgMCBsMCAxLjg4IGwtNS4xNiAwIGwwIDYuMSBsLTIuMjYgMCBsMCAtMTQgbDguNTIgMCBsMCAyIHogTTU5LjQ0OCAxNy45NiBsNi4zNCAwIGwwIDIuMDQgbC02Ljc0IDAgbC0xLjggMCBsMCAtMTQgbDIuMiAwIGw2LjE2IDAgbDAgMi4wNCBsLTYuMTYgMCBsMCAzLjkyIGw0Ljc0IDAgbDAgMiBsLTQuNzQgMCBsMCA0IHogTTc2Ljk4NDAwMDAwMDAwMDAxIDIyLjY0IGwxLjcgLTQuODQgbDEuOSAwIGwtMS43NiA0Ljg0IGwtMS44NCAwIHogTTExNy44MTYgNiBsMCAyLjA0IGwtMy43MiAwIGwwIDExLjk2IGwtMi4yIDAgbDAgLTExLjk2IGwtMy43MiAwIGwwIC0yLjA0IGw5LjY0IDAgeiBNMTM3LjAxMiA1LjgwMDAwMDAwMDAwMDAwMSBjMy43NiAwIDcuMiAyLjk2IDcuMiA3LjIgcy0zLjQ0IDcuMiAtNy4yIDcuMiBzLTcuMiAtMi45NiAtNy4yIC03LjIgczMuNDQgLTcuMiA3LjIgLTcuMiB6IE0xMzcuMDEyIDE4LjEyIGMyLjU4IDAgNC45MiAtMi4xMiA0LjkyIC01LjEyIHMtMi4zNCAtNS4xMiAtNC45MiAtNS4xMiBzLTQuOTIgMi4xMiAtNC45MiA1LjEyIHMyLjM0IDUuMTIgNC45MiA1LjEyIHogTTE2OS44MjggMTIuNzgwMDAwMDAwMDAwMDAxIGMwLjQ0IDQuNTggLTIuNjIgNy40MiAtNi4zMiA3LjQyIGMtMy44NCAwIC03LjIgLTIuOTYgLTcuMiAtNy4yIHMzLjQ0IC03LjIgNy4yIC03LjIgYzEuOCAwIDMuNDIgMC42IDQuNjYgMS42NiBsLTEuMzQgMS41MiBjLTAuODggLTAuNjggLTIuMDIgLTEuMSAtMy4xOCAtMS4xIGMtMi43MiAwIC01LjA2IDIuMTIgLTUuMDYgNS4xMiBzMi4yNiA1LjEyIDQuOTIgNS4xMiBjMi4yMiAwIDMuODYgLTEuMDIgNC4yOCAtMy40NCBsLTMuNzQgMCBsMCAtMS45IGw1Ljc4IDAgeiBNMTg0LjQ2NDAwMDAwMDAwMDAzIDE3Ljk2IGw2LjM0IDAgbDAgMi4wNCBsLTYuNzQgMCBsLTEuOCAwIGwwIC0xNCBsMi4yIDAgbDYuMTYgMCBsMCAyLjA0IGwtNi4xNiAwIGwwIDMuOTIgbDQuNzQgMCBsMCAyIGwtNC43NCAwIGwwIDQgeiBNMjEyLjQ0MDAwMDAwMDAwMDAzIDYgbDAgMi4wNCBsLTMuNzIgMCBsMCAxMS45NiBsLTIuMiAwIGwwIC0xMS45NiBsLTMuNzIgMCBsMCAtMi4wNCBsOS42NCAwIHogTTIzMy40MTYwMDAwMDAwMDAwMyA2IGwyLjIgMCBsMCAxNCBsLTIuMiAwIGwwIC01LjkyIGwtNi40OCAwIGwwIDUuOTIgbC0yLjIgMCBsMCAtMTQgbDIuMiAwIGwwIDYuMDQgbDYuNDggMCBsMCAtNi4wNCB6IE0yNTAuNTEyMDAwMDAwMDAwMDMgMTcuOTYgbDYuMzQgMCBsMCAyLjA0IGwtNi43NCAwIGwtMS44IDAgbDAgLTE0IGwyLjIgMCBsNi4xNiAwIGwwIDIuMDQgbC02LjE2IDAgbDAgMy45MiBsNC43NCAwIGwwIDIgbC00Ljc0IDAgbDAgNCB6IE0yNzkuODQ4IDIwIGwtMi4zNiAwIGwtMy4zIC00Ljg4IGwtMC4yNCAwIGwtMi41IDAgbDAgNC44OCBsLTIuMiAwIGwwIC0xNCBsNC43IDAgYzMuMTQgMCA1LjA2IDEuOTIgNS4wNiA0LjYyIGMwIDEuOTYgLTEuMDIgMy40NiAtMi43OCA0LjEyIHogTTI3MS40NDggOC4wNCBsMCA1LjE2IGwyLjQgMCBjMS43OCAwIDIuOTYgLTAuODQgMi45NiAtMi41OCBzLTEuMTggLTIuNTggLTIuOTYgLTIuNTggbC0yLjQgMCB6Ij48L3BhdGg+DQogICAgPC9nPg0KPC9zdmc+">
            </div>
            <form class="flex mt-8 self-start form-name" action="<?= base_url('admin/profile/updatename') ?>" method="post">
                <input disabled placeholder="admin name" type="text" name="name" id="name" class="rounded-l-lg border max-w-xs bg-gray-50 border-y border-r-0 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:z-20 focus:border-x inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $name ?>">
                <button onclick="toggle(this)" data-type="edit" data-field="name" class="cursor-pointer hover:border border border-gray-300  hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-yellow-200 max-w-xl rounded-e-lg">
                    <svg class="w-4 h-4 text-gray-700 edit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 20">
                        <path d="M20.168 6.136 14.325.293a1 1 0 0 0-1.414 0l-1.445 1.444a1 1 0 0 0 0 1.414l5.844 5.843a1 1 0 0 0 1.414 0l1.444-1.444a1 1 0 0 0 0-1.414Zm-4.205 2.927L11.4 4.5a1 1 0 0 0-1-.25L4.944 5.9a1 1 0 0 0-.652.624L.518 17.206a1 1 0 0 0 .236 1.04l.023.023 6.606-6.606a2.616 2.616 0 1 1 3.65 1.304 2.615 2.615 0 0 1-2.233.108l-6.61 6.609.024.023a1 1 0 0 0 1.04.236l10.682-3.773a1 1 0 0 0 .624-.653l1.653-5.457a.999.999 0 0 0-.25-.997Z"></path>
                        <path d="M10.233 11.1a.613.613 0 1 0-.867-.868.613.613 0 0 0 .867.868Z"></path>
                    </svg>
                    <svg class="w-4 h-4 text-gray-700 confirm hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="mt-8 border-t w-full border-t-gray-400 pt-6">
            <button onclick="togglepassword(this)" class="w-fit text-xs font-bold p-2 text-gray-500 uppercase mb-4 flex items-center hover:bg-gray-200 rounded">
                <svg class="w-3.5 h-3.5 mr-1 transition-all inline-block text-gray-500 -rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"></path>
                </svg>
                change password
                <svg class="w-3.5 h-3.5 ml-3 transition-all text-gray-500 -rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"></path>
                </svg>
            </button>
            <div id="collapse-password" class="h-0 overflow-hidden pb-3">
                <div class="mt-3 flex items-center max-w-sm text-xs font-semibold p-2 border border-blue-500 text-blue-500 rounded bg-blue-100">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
                    <p>Password should be minimum 8 characters and contain at least one letter, one number and one special character
                    </p>
                </div>
                <form class="flex mt-3 max-w-sm" action="<?= base_url('admin/profile/changepassword') ?>" method="post">
                    <div class="flex flex-col flex-grow max-w-sm">
                        <input onkeyup="passwordtextchange()" type="password" name="oldp" id="oldp"   class="flex-grow border-e-0 focus:border-e rounded-es-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" placeholder="old password">
                        <input onkeyup="passwordtextchange()" minlength="8" type="password" name="newp" id="newp"   class="inputpass flex-grow bg-gray-50 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:z-20 focus:border inline-block w-full p-2.5 border-0 border-gray-300 border-s" placeholder="new password">
                        <input onkeyup="passwordtextchange()" minlength="8" type="password" name="newpc" id="newpc" class="inputpass flex-grow border-s rounded-es-lg bg-gray-50 border-y border-x-0 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:z-20 focus:border-x inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" placeholder="confirm password">
                    </div>
                    <button onclick="changepassword()" disabled data-type="edit" id="button-changep" data-field="password" class="cursor-pointer hover:border border border-gray-300 disabled:hover:border-gray-300 disabled:hover:shadow-none bg-green-200 hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg disabled:text-gray-300 py-2 gap-1 flex items-center justify-center disabled:bg-gray-200 max-w-xl rounded-e-lg">
                        <svg class="w-4 h-4 confirm" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </button>
                </form>
                
            </div>
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.inputpass').on('input', function() {
            var c = this.selectionStart,
                r = /[^\S]/gi,
                v = $(this).val();
            if(r.test(v)) {
                $(this).val(v.replace(r, ''));
                c--;
            }
            this.setSelectionRange(c, c);
        });

        var success = <?= isset($success) ? "'".$success."'" : '""' ?>;
        var error =   <?= isset($error)   ? "'".$error."'"   : '""' ?>;

        if(success != ''){
            $('.alert-success').fadeIn(200).delay(3000).fadeOut(200);
            $('#alert-top-success-text').text(success);
        }
        if(error != ''){
            $('.alert-error').fadeIn(200).delay(3000).fadeOut(200);
            $('#alert-top-error-text').text(error);
        }
    });

    function toggle(e){
        var edit = 'edit';
        var confirm = 'confirm';        
        var yellow = 'bg-yellow-200';
        var green = 'bg-green-300';

        if($(e).attr('data-type') == edit){
            enableEdit(e);

            $(e).removeClass(yellow);
            $(e).addClass(green);
            $(e).children('svg.edit').addClass('hidden');
            $(e).children('svg.confirm').removeClass('hidden');

            $(e).attr('data-type', confirm);
            event.preventDefault();
        }
        else if($(e).attr('data-type') == confirm){
            change(e);

            //if refreshing no need below
            $(e).addClass(yellow);
            $(e).removeClass(green);
            $(e).children('svg.edit').removeClass('hidden');
            $(e).children('svg.confirm').addClass('hidden');

            $(e).attr('data-type', edit);
        }
    }

    function enableEdit(e){
        var field = $(e).data('field');

        if(field == 'name'){
            $('#regnum').removeAttr('disabled');
            $('#name').removeAttr('disabled');
        }
        
    }

    function change(e){
        var field = $(e).data('field');

        if(field == 'profile'){
            $('#label-editprofile').addClass('hidden');
            $($(e).parent('form')).submit();
        }
        else if(field == 'name'){
            $($(e).parent('form')).submit();
        }
        else if(field == 'contact'){
            $($(e).parent('form')).submit();

        }
        else if(field == 'location'){
            $($(e).parent('form')).submit();
        }
    }

    function passwordtextchange(){
        var oldp = $('#oldp').val();
        var newp = $('#newp').val();
        var newpc = $('#newpc').val();
        const regexPassword = '^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$';

        if(oldp.length == 0 || newp.length < 8 || newpc.length < 8 || newp != newpc || !newp.match(regexPassword))
            $('#button-changep').attr('disabled', true);
        else
            $('#button-changep').removeAttr('disabled');
    }

    function changepassword(){
        var oldp = $('#oldp').val();
        var newp = $('#newp').val();
        var newpc = $('#newpc').val();
        const regexPassword = '^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$';

        if(oldp.length == 0 || newp.length < 8 || newpc.length < 8 || newp != newpc || !newp.match(regexPassword))
            return;
        
    }

    function togglepassword(e){
        if($(e).children('svg').hasClass('-rotate-90')){
        //expand
        $(e).children('svg').removeClass('-rotate-90');
        $('#collapse-password').removeClass('overflow-hidden');
        $('#collapse-password').removeClass('h-0');

        }else{
        //collapse
        $(e).children('svg').addClass('-rotate-90');
        $('#collapse-password').addClass('h-0');
        $('#collapse-password').addClass('overflow-hidden');
        }
    }
</script>