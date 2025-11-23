#!/usr/bin/env python3
"""
Split the large cedict.json into smaller chunks for progressive loading.
This dramatically improves initial page load time by loading the most common
words first and the full dictionary in the background.
"""

import json
import os
import sys

def chunk_dictionary(input_file='cedict.json', output_dir='dict_chunks', chunk_size=5000):
    """
    Split dictionary into chunks.

    Args:
        input_file: Path to the full dictionary JSON
        output_dir: Directory to save chunks
        chunk_size: Number of entries per chunk
    """
    print(f"📖 Loading dictionary from {input_file}...")

    try:
        with open(input_file, 'r', encoding='utf-8') as f:
            dictionary = json.load(f)
    except FileNotFoundError:
        print(f"❌ Error: {input_file} not found!")
        sys.exit(1)

    total_entries = len(dictionary)
    print(f"✅ Loaded {total_entries:,} entries")

    # Create output directory
    os.makedirs(output_dir, exist_ok=True)

    # Calculate number of chunks needed
    num_chunks = (total_entries + chunk_size - 1) // chunk_size
    print(f"📦 Creating {num_chunks} chunks of ~{chunk_size} entries each...")

    # Split into chunks
    for i in range(num_chunks):
        start_idx = i * chunk_size
        end_idx = min((i + 1) * chunk_size, total_entries)
        chunk = dictionary[start_idx:end_idx]

        chunk_filename = f"{output_dir}/chunk_{i}.json"
        with open(chunk_filename, 'w', encoding='utf-8') as f:
            json.dump(chunk, f, ensure_ascii=False, separators=(',', ':'))

        chunk_bytes = os.path.getsize(chunk_filename)
        print(f"  ✓ {chunk_filename}: {len(chunk):,} entries ({chunk_bytes / 1024:.1f} KB)")

    # Create manifest file
    manifest = {
        'total_entries': total_entries,
        'num_chunks': num_chunks,
        'chunk_size': chunk_size,
        'chunks': [f"chunk_{i}.json" for i in range(num_chunks)]
    }

    manifest_file = f"{output_dir}/manifest.json"
    with open(manifest_file, 'w', encoding='utf-8') as f:
        json.dump(manifest, f, indent=2)

    print(f"\n✅ Created manifest: {manifest_file}")
    print(f"📊 Summary:")
    print(f"   - Total entries: {total_entries:,}")
    print(f"   - Chunks: {num_chunks}")
    print(f"   - Avg chunk size: {chunk_size:,} entries")

    # Calculate total size
    total_size = sum(
        os.path.getsize(f"{output_dir}/chunk_{i}.json")
        for i in range(num_chunks)
    )
    original_size = os.path.getsize(input_file)

    print(f"   - Original size: {original_size / 1024 / 1024:.2f} MB")
    print(f"   - Chunked total: {total_size / 1024 / 1024:.2f} MB")
    print(f"   - First chunk: {os.path.getsize(f'{output_dir}/chunk_0.json') / 1024:.1f} KB")
    print(f"\n✨ Progressive loading ready! Users will see results after downloading just the first chunk.")

if __name__ == '__main__':
    chunk_dictionary()
