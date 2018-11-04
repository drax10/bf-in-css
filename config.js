const program = ">>>";
const initialMemory = ""

const fillList = (size, fillWith) => [...Array(size)].map(()=>fillWith);

var config = {
  memory: Object.assign( fillList(20, 0), initialMemory.split('') ),
  commands: Object.assign( fillList(20, ''), program.split('') )
};

module.exports = config;
