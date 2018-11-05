const program = "+[>+]";
const initialMemory = ""

const fillList = (size, fillWith) => [...Array(size)].map(()=>fillWith);

var config = {
  memory: Object.assign( fillList(23*3, 0), initialMemory.split('') ),
  commands: Object.assign( fillList(23*3, ''), program.split('') )
};

module.exports = config;
