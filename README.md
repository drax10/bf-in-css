# Brainf\*\*\* interpreter using CSS + HTML

A BF interpreter written in HTML and CSS that you can try out [here](https://bf-in-css.netlify.com). The catch is that you need to click in the same spot repeatedly to keep it running. If you’re unfamiliar with what BF is take a look at [its very short Wikipedia page](https://en.m.wikipedia.org/wiki/Brainfuck).

![Screen Capture of the interpreter](https://raw.githubusercontent.com/JoshuaDraxten/bf-in-css/master/assets/screencap.gif?token=AE6foatE8ZldADpqXtvTTPuYnEHLPF9uks5b6OftwA%3D%3D)

⚠️  Please note that because of the CSS hacks in use, clicking too fast can break the program completely.

## Browser Support

Browser  | Support |
 ------------ | ------------- |
Chrome        | ✅  Works |
Firefox       | ✅  Works |
Safari        | 🙅‍♂️ Doesn't support [`contenteditable` as a global attribute](https://html.spec.whatwg.org/multipage/dom.html#global-attributes) sadly |
Opera         | ✅  Works  |
Edge          | 🤷‍♂️ Dunno. Let me know if you try it out! |

---

## What's going on?

In a nutshell, the code works by keeping the state and code in input boxes that can be selected using the `:checked` pseudo-selector. Using many different css rules looking at what checkbox/radioboxes are currentlty checked, a label, with its `for` attribute set to the next input to toggle, is positioned in the bottom left of the screen where the mouse is positioned. So whenever someone clicks the label in the bottom left, the state is changed, changing the CSS logic for which label element is shown in the bottom left.

## Removing 3 commands

Typically, BF is ran with 8-bit cells that can hold values up to 255, but to implement adding and subtracting on those cells would require many more clicks and complexity that is unnecessary since you can [prove that 1-bit BF is still Turing complete using reduction](http://samuelhughes.com/boof/). Perhaps, I will have another masochistic streak in the future and update the project to support 8-bit cells. But for now, since the cell size is 1 bit the + and - commands do the exact same thing, so I’ve removed the `-` command.

I have not implemented the two i/o commands, because clicking a box repeatedly was already user-unfriendly. Besides, if you’re a big enough nerd to be reading this, you should be fine reading your own binary.

## Biggest challenge

**Managing Scope**

The most difficult part of this project was managing different loops. If I encounter a `]` command I may need to go back to it’s corresponding `[` command, but if there is a loop within that loop, it cannot return to any specific `[` symbol.

To have a useful bracket matching system in CSS, I need to be able to change the position of a bracket element in a flat structure. Doing this with simple sibling selectors is impossible without listing out every possible combination, which in my opinion is cheating.

After a lot of time, I figured out a great hack — using [css counters](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Lists_and_Counters/Using_CSS_counters)! As you can see in [this example](https://codepen.io/JoshuaDraxten/pen/ZqYjQz/), if you use Roman numerals, you can get 4 layers of correctly indented brackets (counting the zeroth layer), which in practice is a limitation I did not run into when playing around with the BF code

**Switching tasks**

Imagine the active command to preform is the `+` command. In BF this means to increment the memory of the cell. In this 1-bit version, it just has to toggle between 1 and 0. For this command the CSS interpreter does the following:

1. See the active command is `+`
2. Position the label with it’s `for` attribute attached to the memory currently being pointed to
3. When the memory is changed go to the next command

Because the command shown is completely dependent on the state before it, if you don’t change the state, the command is never changed and the interpreter essentially halts. To get around this, I used a hack that works in every browser apart from safari — [`contenteditable` is a global attribute](https://html.spec.whatwg.org/multipage/dom.html#global-attributes) so you can make virtually any element act like a text input. If you add the `contenteditable` attribute checkbox, when you check it the cursor will go inside it and the `:focus` pseudo-selector will select it.

Using this mechanic, I was able to say if any memory value checkbox is being focused on (i.e. it has been changed just now) show the label attached to the radio box for the next command.

## Installing

To install run the following:
```bash
git clone https://github.com/JoshuaDraxten/bf-in-css.git
cd bf-in-css/
npm install
npm run-script build
```

The project will be generated in the `public/` directory
