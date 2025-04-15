import React from 'react';

export default function arr() {
  const arr = [1, 2, 3, 4, 5];
  const arr2 = arr.map((item) => item * 2);
  console.log(arr2); // [2, 4, 6, 8, 10]

  return (
    <div>
      <h1>Array Example</h1>
      <p>Original Array: {JSON.stringify(arr)}</p>
      <p>Doubled Array: {JSON.stringify(arr2)}</p>
    </div>
  );
}
